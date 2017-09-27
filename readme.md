# Minecraft Schematic Converter

Convert a minecraft schematic to a readable format.

This is intended for 2D schematics only. The script will read all layers, but will only return what is visible from the top.

This was written to accompany the tool written by [/u/redstonehelper](//www.reddit.com/user/redstonehelper) to help generate pixel art for maps:

* https://www.reddit.com/r/Minecraft/comments/2yck3f/

## Usage


Drop your schematics into the main directory, ensure the names start with `section`. You can then run the script from the command line, if you wish:

    php index.php > out.html  
    
Or if you've got a web server configured, you can view the index in a browser.