# VSTS Build - Access to the registry key ... is denied

If you have a project which is [registered for COM Interop][com-interop] then it will not build in Visual Studio Team Services (VSTS), complaining with an error like:

	C:\Program Files (x86)\Microsoft Visual Studio\2017\Enterprise\MSBuild\15.0\Bin\Microsoft.Common.CurrentVersion.targets (4640, 5)
	C:\Program Files (x86)\Microsoft Visual Studio\2017\Enterprise\MSBuild\15.0\Bin\Microsoft.Common.CurrentVersion.targets(4640,5): Error MSB3216: Cannot register assembly "d:\a\1\s\MyAddIn\MyAddIn\bin\Release\MyAddIn.dll" - access denied. Please make sure you're running the application as administrator. Access to the registry key 'HKEY_CLASSES_ROOT\MyAddIn.SomeClassName' is denied.

This is a hugely confusing error with a variety of causes, but if you see this error and your application **is not designed or intended to interact with the registry**, and it *is* set for COM interop, you **need to turn off COM interop**.

## How to fix

For the affected project, open Project Properties (in Visual Studio). Go to the Compile tab, scroll down, turn off 'Register for COM interop'.

Now, if you need this flag to be turned on for regular build on your dev machines (hint: you do) then you may wish to make this change as part of your build process instead. In the affected `.vbproj` or `.csproj` file, replace:

	<RegisterForComInterop>true</RegisterForComInterop>
	with
	<RegisterForComInterop>false</RegisterForComInterop>

Automating this process is left as an exercise for you :)

[com-interop]: ./add-a-reference-to-vsto-project-from-vba-editor