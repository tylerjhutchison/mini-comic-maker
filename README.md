mini-comic-maker
================

A simple script for making a paginated mini comic.

- This works best for a mini comic printed on 8.5 x 11 standard US LETTER paper in LANDSCAPE orientation.
- This script outputs an exact 8.5 x 11 PDF that is properly paginated and ready for duplex printing. So when you print this PDF make sure it is printed at 100% size with no scaling and that edges are ignored.
- These script can be used to generate file for larger paper, but will require further modification.
- When creating your single pages make sure to include whitespace around the boarders, most Xerox machines are not great at edge printing unless you really know how to properly set stuff up. .
- This script only works with PNG files.
- Make sure your PNG files are exactly half the width of a page, if they are too large or too small the SPREAD page may not be properly centered.
- I reccomend using PNGs that are 1650 pixels wide, this is 5.5 inches printed at 300 dpi.


Quick Start
--------
1. Create new folder. e.g. MyExampleComic
2. Place image files in folder. e.g. Page0001.png, Page0002.png, Page0003.png etc.
3. Edit Settings in makeComic.php: 
  - **$numberOfPages** : The number of pages in your book. Make sure this number is divisible by 4. If the amount of pages in your comic is not divisible by 4 then pad it by adding blank pages to the front or back before running the script.
  - **$projectDir** : The name of the folder containing your image files e.g. MyExampleComic
  - **$pageName** : The prefix name of your image files. e.g. If your image files are named Page0001.png the $pageName should be "Page"
4. Run Script: makeComic.php. See the sections below for how to run a PHP script.

How to run a PHP script on OS X for beginners.
------------
1. **Open the Terminal**. It is located in Applications/Utilities/Terminal
2. **Navigate to  mini-comic-maker**. If your mini-comic-maker folder is located on your desktop type: cd Desktop/mini-comic-maker and then press enter. If your mini-comic-maker is located in your Documents under a folder labled comics type: cd Documents/comics/mini-comic-maker and then press enter.
3. **Run the Script**. Type in php makeComic.php and press enter. The script will start building your comic. When it is complete, look for the files labled: finished.pdf in your project folder.

How to run a PHP script on Windows
-------
I don't actually know how to do this I have never used Windows as a dev environment before. But it seems like you can probably find some instructions pretty easily, this was one of the first results I found from google: http://editrocket.com/articles/php_windows.html
