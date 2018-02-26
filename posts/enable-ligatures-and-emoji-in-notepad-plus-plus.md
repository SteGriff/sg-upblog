# Enable ligatures and emoji in Notepad++

By default, emoji don't work very well in Notepad++ and font ligatures don't work at all. I have pieced together this guide from other people who have worked on the problems, notably this [GitHub issue about ligatures in Notepad++][enable-ligatures-github] and this [newsgroup post about character encoding detection][do-not-guess-encoding]. Shoulders of giants etc.

## Enable DirectWrite




It won't currently work "out of the box". The text rendering needs tweaked but you can do it with a plugin. Keep in mind support for ligatures is not officially supported so you might run into issues.

This is the easiest way I know (without recompiling) to get ligatures to work in Notepad++:

    Install a recent version of Fira Code (use either the normal font or the retina as those are the only ones that seem to work).
    Install LuaScript via the Plugin Manager (you can also use PythonScript if you are more comfortable with it or want to use a 10 ton hammer).
    Select the font via Settings > Style Configurator > Global Styles > Global Override. Select "Fira Code" for the font style and turn on Enable global font
    Edit the LuaScript startup file by doing Plugins > LuaScript > Edit Startup Script and add the following code:

editor1.Technology = SC_TECHNOLOGY_DIRECTWRITE
editor2.Technology = SC_TECHNOLOGY_DIRECTWRITE

Restart and enjoy.

----

Uncheck Autodetect character encoding from Settings->Preferences->MISC.

In Settings->Preferences->New Document select the Encoding you want by using the dropdown list.

If you use the session functionality Settings->Preferences->Backup take care that you close
any document with different encoding before restarting npp, otherwise it will load the codepage
from the information within then session files.

----

[firacode]: https://github.com/tonsky/FiraCode#solution
[enable-ligatures-github]: https://github.com/notepad-plus-plus/notepad-plus-plus/issues/2287#issuecomment-256638098
[do-not-guess-encoding]: https://notepad-plus-plus.org/community/topic/11074.rss