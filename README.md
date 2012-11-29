# Binary Ordered List

This **CSS-file** creates a binary ordered list from html `<ol>` lists.

## Usage
To use this library you can use the compiled files in the [CSS-folder](css) or you can compile you own files. 
The CSS-file are included in the *html-page* and then applies to all `<ol>` tags. 

*This library will overwrite the list default style with a `list-style-type: none;`, if you do not want this, edit 
this in the CSS-file*. **This means that there will be no numbers at all in old browsers**

### HTML
```html
<head>
  <link href="css/binary-ol-20-rows.min.css" rel="stylesheet" type="text/html" />
</head>
<ol>
  <li>First line</li>
  <li>Second line</li>
  <li>Third line</li>
  <li>Fourth line</li>
</ol>
```

### Output
```
0. First line
1. Second line
10. Third line
11. Fourth line
```

## Compiling
The file <compile-css.php> is used to compile a specific CSS-file with your properties. 
The propertis needs to be edited in this file. The file will output to standard output and you need to pipe it into your
file.

```console
php compile-css.php > my-custom.css
```

