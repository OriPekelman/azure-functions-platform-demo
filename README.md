# Azure Platform.sh WebHook Function 

Sends an email each time a branch is created

## Configuration

### Set Env Variables (values are examples)
```
AzureWebJobsSendGridApiKey = 70g0vsdyg2.....HHkonQ4yvHEG
DEPLOY_OR_NOT_URL = https://master-7rqtwti-qa40vsdyw66fk.eu.platform.sh/
```

### To integrate with platform.sh
This will set a webhook on a project that will ping the azure function 
`platform integration:add --type=webhook --url=https://platformsh-sendmail.azurewebsites.net/api/platformsh-sendmail\?code\=n00e1sn70g0vsdyg2n1tc5w...tt83x4eokr19k9`
