
This is the location where all html, css and javascript source files are located.

Each page consists of each file type, so for every page there is
* a html file under [html](html) with ending `.php`,
* a javascript file under [js](js) and
* a css file under [css](css).

These files are connected <b>automatically</b> so if you create a file `page.html`, 
the js file `page.js` and the css file `page.css` are linked automatically. See the following

<pre>
view
  css
    page.css
  html
    page.html
  js
    page.js
</pre>

These files must not exist! But if you create them they are told to the browser which will fetch
and interpret these files.