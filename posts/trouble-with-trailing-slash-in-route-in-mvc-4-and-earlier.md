# Trouble with trailing slash in route in MVC 4 and earlier

I'm working on an MVC 4 project with a wildcard route like this:

	//Catch-all /products/route
	routes.MapRoute(
		name: "Product List",
		url: "products/{*UrlPath}",
		defaults: new { controller = "Products", action = "ProductList" }
	);

This works fine until you add a terminating slash to the incoming URL. So `example.com/products/seeds/sunflower` is fine but `example.com/products/seeds/sunflower/` is not fine. The latter falls back to the default `/controller/action/id` route and ends up on the index page.

## What I tried

 * Moved the wildcard route definition to the top of the RegisterRoutes sub (because order is significant) - no change
 * Adding `routes.AppendTrailingSlash = true;` but this property was only introduced in MVC 5 and does not exist in 4 - probably wouldn't help anyway
 * Set up a minimal MVC 5 project (a 'spike') to test the behaviour and it worked fine with wildcards ending with or without a slash.
 * Spent a while winding my spike project back to MVC 4 (which was unreasonably difficult), and it **also worked with or without a slash**
 
## Side note - How to revert to MVC 4

For each of the following projects, do `Uninstall-Package <name>` and then the `Install-Package` command from the version-specific pages below:

 * https://www.nuget.org/packages/Microsoft.AspNet.Mvc/4.0.30506
 * https://www.nuget.org/packages/Microsoft.AspNet.Razor/2.0.30506
 * https://www.nuget.org/packages/Microsoft.AspNet.WebPages/2.0.30506

See [the notes for upgrading from MVC 3 to 4][mvc-upgrade] and make sure that in all relevant ways, your project has whatever is stipulated for v4. **Note very well** that your `assembly` nodes need to say `4.0.0.0` and not the specific version such as `4.0.30506.0`!!

I also deleted all of the `<dependentAssembly>` sections.

[mvc-upgrade]: https://docs.microsoft.com/en-us/aspnet/whitepapers/mvc4-beta-release-notes