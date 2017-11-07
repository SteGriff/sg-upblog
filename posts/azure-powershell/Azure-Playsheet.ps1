$login = Login-AzureRmAccount

# Test Where filters on local services
$svcs = Get-Service
$svcs | Where Name -like '*Adobe*'

# FInd out how to pipe things to Select-AzureRmSub
Get-Help Select-AzureRmSubscription -Parameter 'SubscriptionName'

# Yesterday I'm sure subs came back with a Name field, but today it's called SubscriptionName?
$subs = Get-AzureRmSubscription
$subs | Where Name -like '*MPN*' | Select @{n='SubscriptionName';e={$_.Name}} | Select-AzureRmSubscription
Get-AzureRmContext

# Simpler selection using new field names
$subs = Get-AzureRmSubscription
$subs | Where SubscriptionName -like '*MPN*' | Select-AzureRmSubscription
Get-AzureRmContext

$eur = 'North Europe'
$proj = 'paprika'
New-AzureRmResourceGroup -Name 'test' -Location $eur

Get-AzureRmResourceGroup -Name 'pap*'

# Register storage and create storage account
Register-AzureRmResourceProvider -ProviderNamespace 'Microsoft.Storage'
$properties = @{"AccountType"="Standard_ZRS"}
New-AzureRmResource `
    -ResourceGroupName $proj `
    -Name ($proj + "stor") `
    -ResourceType 'Microsoft.Storage/storageAccounts' `
    -Location $eur `
    -Properties $properties `
    -ApiVersion "2015-06-15" `
    -Force 

New-AzureRmStorageAccount -

Get-AzureRmResource
