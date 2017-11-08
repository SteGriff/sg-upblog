# Post to Teams via HTTP with Microsoft Flow and PowerShell

Go to https://flow.microsoft.com and sign in

Click 'My flows' in the nav, click 'Create from blank'

Type 'request' in the connector search and pick 'Request / Reponse - Request' from the list

Click 'Use sample payload to generate schema' and paste in an example packet of your construction like:

{
	"message" : "hello world"
}

This will create a JSON schema for you. Make sure you use double quotes in your sample payload or it will trip up

Click New Step

Search for Team, pick 'Microsoft Teams - Post message' and sign in as required

Choose the details of the team and channel you want to post to, and for Message text, choose the 'message' property we just created - it will be suggested in the little box to the right.

Once you have given your flow a name and saved it, go back in to edit it. Look at the Request step and copy the HTTP POST URL into a notes window to keep it safe.

Open up a new PowerShell or ISE. Paste in this script and adjust it for your URL and JSON schema (if you just used the 'message' schema from above then you can leave it)

	$url = 'https://prod-34.westeurope.logic.azure.com/workflows/...'
	$message = "Posted from PowerShell via Logic App"
	$body = "{ 'message' : '$message' }"
	Invoke-WebRequest -UseBasicParsing $url -ContentType "application/json" -Method POST -Body $body

Run the script and after a few seconds, your message will appear in Teams! Woohoo!