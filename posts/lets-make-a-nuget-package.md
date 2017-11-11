# Let's make a NuGet Package

I wanted to make a NuGet package for Paprika.Net so I've documented the process here to make it easy for beginners to follow along! This guide is based on publishing **one project** alone, if you have a more complex need then you should read about [deciding which assemblies to package][decide]

First, go to [nuget download page][nuget-download] and download the recommended version of the Command Line tools *even if you have Visual Studio*; the command line tools are stand-alone and are not included with the NuGet Package Manager in VS.

Once you have installed it, put it in your `PATH`. If you don't know what you're doing, try my [Windows /usr/bin trick][usrbin].

[decide]: https://docs.microsoft.com/en-us/nuget/create-packages/creating-a-package#deciding-which-assemblies-to-package
[nuget-download]: https://www.nuget.org/downloads
[usrbin]: ./mimic-usr-bin-in-windows/

## Write or generate a `.nuspec`

The [nuspec file][nuspec] tells NuGet about your package; what it contains, what it's called, its version information, etc. 

It is an XML file which can be written by hand, or better, generated! 

Open a command prompt in the directory of the project you want to publish. This sets the name of the file intelligently, but it doesn't set any of the content (the content is always 90% the same). Use the `nuget spec` command:

	C:\Projects\ste\paprika.net\Paprika.Net>nuget spec
	Created 'Paprika.Net.nuspec' successfully.
	
You can set some more of the info automatically using the `-a` flag and pointing it at an assembly. This will set the `version`, `id`, `authors` and `owners`,  but you might want to change some of those anyway:

	> nuget spec -a .\bin\Release\Paprika.Net.dll
	
Now open the created nuspec file in your text editor of choice. It looks something like this:

	<?xml version="1.0"?>
	<package >
	  <metadata>
		<id>$id$</id>
		<version>$version$</version>
		<title>$title$</title>
		<authors>$author$</authors>
		<owners>Stephen Griffiths</owners>
		<licenseUrl>http://LICENSE_URL_HERE_OR_DELETE_THIS_LINE</licenseUrl>
		<projectUrl>http://PROJECT_URL_HERE_OR_DELETE_THIS_LINE</projectUrl>
		<iconUrl>http://ICON_URL_HERE_OR_DELETE_THIS_LINE</iconUrl>
		<requireLicenseAcceptance>false</requireLicenseAcceptance>
		<description>$description$</description>
		<releaseNotes>Summary of changes made in this release of the package.</releaseNotes>
		<copyright>Copyright 2017</copyright>
		<tags>Tag1 Tag2</tags>
	  </metadata>
	</package>
	
Read through the file for a sec. At this point I realised I needed to add a **license** to my GitHub project, and I wanted to add an icon too (I'd already made one previously). So I checked these things into the GitHub repos and pasted the URLs in here.

Some of the `$values$` will be replaced at Publish-time by automated values. Including `$version$`. 

You should fill in:

 * `id` (like `SteGriff.Paprika.Net` or `MyNameOrCompany.ThisPackage.Component`
 * `authors` and `owners` with your actual name/company name
 * the `Url` sections (or delete the whole line if you don't want/need them)
 * `tags` (for discovery on the NuGet package gallery)
 
If your package has dependencies, fill in the `<dependencies>` section. Mine does not, so I can delete it!
 
## Add files in the `.nuspec`

Below the `<metadata>` section, we are going to add a `<files>` section which describes the DLLs and supporting files which you are going to package:

	<metadata>
		...
	</metadata>
	<files>
		<file src="bin\Release\Paprika.Net.dll" target="lib\Paprika.Net.dll" />
	</files>
	
The **target** section has to match a certain specification, you can find out more on the MS [creating a package][creating] post. But I'll keep it simple! Your package's main libraries go to the `lib\` path. You can add static files too, read this great MVP [post about creating packages][mvpblog] for more info.

[creating]: https://docs.microsoft.com/en-us/nuget/create-packages/creating-a-package#from-a-convention-based-working-directory
[nuspec]: https://docs.microsoft.com/en-us/nuget/create-packages/creating-a-package#the-role-and-structure-of-the-nuspec-file
[mvpblog]: https://blogs.msdn.microsoft.com/mvpawardprogram/2016/06/28/creating-nuget-packages/

Use `nuget pack`

Copy your package and paste it in a new directory at C:\NuGetPackages or something

In VS, go to Tools, Options, NuGet Package Manager (drop down arrow), Package Sources, and click Add. Select the new addition and change the source to your directory above, change the name to 'Local Packages'.

To test your package, start a new VS project, and go to NuGet Package Manager. Change the source drop-down in the top-right to 'Local Packages'