# .Net Framework, Core, and Standard

The distinction between these three concepts of .Net Framework, Core, and Standard, has long lay in a foggy corner of my brain saying "Danger! You do not understand the future of the primary technologies you use for everything!". So I was glad when recently I was forced into understanding these things when I tried to create a NuGet package.

By far the best post I have found on this is from the .Net blog; [Introducing .NET Standard][introducing].

[introducing]: https://blogs.msdn.microsoft.com/dotnet/2016/09/26/introducing-net-standard/

## A parable

So to explain, imagine you are making an `Acme.Utilities` library which you want to publish as a package. You build it in .Net Framework 4.5, and pack it up. 

You go to test your package by starting a new Console App and importing it. The only option for creating a Console App in VS2017 is under .Net Core, so naturally you go for that. Unsurprisingly, when you import your package, it complains that your app and the package are not compatible - this is because .Net Core 2.0 and .Net Framework 4.5 are "not compatible" (a simplification, please excuse it for now).

So now you're thinking, well do I have to have a copy of my package code for every framework I want to target? No!

To integrate with the .Net Framework and with .Net Core, your library project needs to target **.Net Standard**:

<table>
<thead>
<tr>
<th>.NET Platform</th>
<th colspan="8" align="center">.NET Standard</th>
</tr>
<tr>
<th align="left"></th>
<th align="right">1.0</th>
<th align="right">1.1</th>
<th align="right">1.2</th>
<th align="right">1.3</th>
<th align="right">1.4</th>
<th align="right">1.5</th>
<th align="right">1.6</th>
<th align="right">2.0</th>
</tr>
</thead>
<tbody>
<tr>
<td align="left">.NET Core</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">1.0</td>
<td align="right">vNext</td>
</tr>
<tr>
<td align="left">.NET Framework</td>
<td align="right">→</td>
<td align="right">4.5</td>
<td align="right">4.5.1</td>
<td align="right">4.6</td>
<td align="right">4.6.1</td>
<td align="right">4.6.2</td>
<td align="right">vNext</td>
<td align="right">4.6.1</td>
</tr>
<tr>
<td align="left">Xamarin.iOS</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">vNext</td>
</tr>
<tr>
<td align="left">Xamarin.Android</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">vNext</td>
</tr>
<tr>
<td align="left">Universal Windows Platform</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">10.0</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">vNext</td>
</tr>
<tr>
<td align="left">Windows</td>
<td align="right">→</td>
<td align="right">8.0</td>
<td align="right">8.1</td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
</tr>
<tr>
<td align="left">Windows Phone</td>
<td align="right">→</td>
<td align="right">→</td>
<td align="right">8.1</td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
</tr>
<tr>
<td align="left">Windows Phone Silverlight</td>
<td align="right">8.0</td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
<td align="right"></td>
</tr>
</tbody>
</table>

When you are making a new projec

You should shoot to support the **lowest .Net Standard version you possibly can**

