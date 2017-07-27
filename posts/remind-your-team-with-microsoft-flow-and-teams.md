# Remind your team with Microsoft Flow and Teams

![Flow templates](./remind-your-team-with-microsoft-flow-and-teams/templates-small.png)

We've started using Microsoft Teams for our chat at work. This makes me very excited about ChatOps and automation opportunities! But what would my easiest opportunity in this arena be? The first thing to occur to me was:

 > How can I remind my team to have a daily scrum while I'm on holiday?
 
So I turned to Microsoft Flow for automation. Flow is a very cool new tool from Microsoft which is essentially enterprise IFTTT with lots of extra features, making it a little bit more developer-focussed but not so much that non-developers can't use it. You connect some trigger(s) such as an incoming chat message, email, tweet, or even an Azure entity, and use them (and their data payload) to activate an action. The actions are mostly the same things as the triggers.

Microsoft (and contributors) provide a load of templates, as you can see in the attached image. But for this I was pretty sure I'd have to start from scratch.

## Attempt 1 - Post to Teams

There is a nifty Connector for Microsoft Teams built right into flow. So I went to:

 * My flows
 * Create from blank
 * Add a schedule trigger (and set it up)
 * New Step
 * Add an action
 * Search 'teams' 
 * Pick 'Microsoft Teams - Post message'
 
Surely with this first class support, this would be the right tool for the job? Well, here are the pros and cons:

 - Simple to set up
 - Posts as me (because it's logged in as me) - not sure if good or bad
 - **Can't send newlines or any other formatting!**
 
Well the last one was a dealbreaker... I really wanted a nice multi-line message with some advice and reminders for the scrum. So how can we do that?

## Attempt 2 - Webhook

After [Ducking][ddg] around for a while

[ddg]: https://duckduckgo.com