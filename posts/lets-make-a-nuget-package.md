# Let's make a NuGet Package

I wanted to make a NuGet package for Paprika.Net so I've documented the process here to make it easy for beginners to follow along! This guide is based on publishing **one project** alone, if you have a more complex need then you should read about [deciding which assemblies to package][decide]

First, go to [nuget download page][nuget-download] and download the recommended version of the Command Line tools *even if you have Visual Studio*; the command line tools are stand-alone and are not included with the NuGet Package Manager in VS.

Once you have installed it, put it in your `PATH`. If you don't know what you're doing, try my [Windows /usr/bin trick][usrbin].

[decide]: https://docs.microsoft.com/en-us/nuget/create-packages/creating-a-package#deciding-which-assemblies-to-package
[nuget-download]: https://www.nuget.org/downloads
[usrbin]: ./mimic-usr-bin-in-windows/

## 1. Write or generate a `.nuspec`

The [nuspec file][nuspec] tells NuGet about your package; what it contains, what it's called, its version information, etc. 

It is an XML file which can be written by hand, or better, generated! 

Open a command prompt in the directory of the project you want to publish. This sets the name of the file intelligently, but it doesn't set any of the content (the content is always 90% the same). Use the `nuget spec` command:

	C:\Projects\ste\paprika.net\Paprika.Net>nuget spec
	Created 'Paprika.Net.nuspec' successfully.
	
Now open the created nuspec file in your text editor of choice

[nuspec]: https://docs.microsoft.com/en-us/nuget/create-packages/creating-a-package#the-role-and-structure-of-the-nuspec-file