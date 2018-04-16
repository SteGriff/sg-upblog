# Implementing 3-legged OAuth for Twitter in .Net

OAuth is hard!

Overview
https://developer.twitter.com/en/docs/basics/authentication/overview/3-legged-oauth

Steps
https://dev.twitter.com/web/sign-in/implementing

UI Details
https://dev.twitter.com/web/sign-in/desktop-browser

.Net Help (Nancy example)
https://github.com/markrendle/NancyTwitter

Worked for OAuth but not for actually using the creds to tweet. For that:
https://blog.dantup.com/2016/07/simplest-csharp-code-to-post-a-tweet-using-oauth/

## Process overview

I should put together all the URL requests and responses to highlight which `token`s to use and stuff.

I could make independent NuGet packages of the code to clear OAuth and build a signature and send a tweet request? Bit of an ask...


## Gotchas 

When you hit `/oauth/access_token`, make sure to store the returned `oauth_token` which will be different to the one you passed in! It should start with a numeric user ID and be quite long!