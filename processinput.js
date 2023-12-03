document.addEventListener("DOMContentLoaded", function () {
  const submitButton = document.getElementById("submitButton");
  const chatOutput = document.getElementById("chatOutput");

  submitButton.addEventListener("click", function () {
    const messageInput = document.getElementById("messageInput").value;

    // Regex pattern to match different commands: add, edit, delete
    const regex = /(add|edit|delete) "(.*?)" "(.*?)" "(.*?)"/;
    const match = messageInput.match(regex);

    if (match && match.length === 5) {
      const command = match[1];
      const taskName = match[2];
      const dueDate = match[3];
      const taskNote = match[4];

      // Display user input in chatOutput
      const userInputElement = document.createElement("div");
      userInputElement.textContent = `You: ${messageInput}`;
      userInputElement.classList.add("user");
      chatOutput.appendChild(userInputElement);

      // Ask for confirmation
      const confirmationElement = document.createElement("div");
      confirmationElement.textContent = `Assistant: Are you sure you want to add ${taskName}? (Yes/No)`;
      confirmationElement.classList.add("assistant");
      chatOutput.appendChild(confirmationElement);

      // Handle user confirmation
      const waitForResponse = function (response) {
        if (response.toLowerCase() === "yes") {
          chatOutput.removeChild(confirmationElement); // Remove confirmation message

          // Proceed with task operation (Send data to dbquery.php using AJAX)
          const taskData = {
            command: command,
            taskName: taskName,
            dueDate: dueDate,
            taskNote: taskNote,
          };

          const xhr = new XMLHttpRequest();
          xhr.open("POST", "dbquery.php", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/json;charset=UTF-8"
          );
          xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                // Response received from server
                const response = xhr.responseText;

                // Display the response in the chatOutput div
                const responseElement = document.createElement("div");
                responseElement.textContent = "Assistant: " + response;
                responseElement.classList.add("assistant");
                chatOutput.appendChild(responseElement);
              } else {
                // Handle error
                const errorElement = document.createElement("div");
                errorElement.textContent = "Error performing task operation";
                chatOutput.appendChild(errorElement);
              }
            }
          };
          xhr.send(JSON.stringify(taskData));
        } else if (response.toLowerCase() === "no") {
          chatOutput.removeChild(confirmationElement); // Remove confirmation message

          // Display response in chatOutput
          const responseElement = document.createElement("div");
          responseElement.textContent = "Okay, I'll wait for another prompt";
          chatOutput.appendChild(responseElement);
        } else {
          // Invalid response
          // Ask for confirmation again
          confirmationElement.textContent = `Assistant: Please respond with 'Yes' or 'No'. Are you sure you want to add ${taskName}? (Yes/No)`;
        }
      };

      // Wait for user response from input
      const inputResponseHandler = function (event) {
        const userInput = event.target.value;
        waitForResponse(userInput);
        // Remove the event listener after getting the response
        event.target.removeEventListener("change", inputResponseHandler);
      };

      // Listen for user input response
      document
        .getElementById("messageInput")
        .addEventListener("change", inputResponseHandler);
    }
  });
});
