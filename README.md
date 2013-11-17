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
3. Edit Settings. Page number, Folder name, image file name.
4. Run Script.
