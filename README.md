Card Generator
==============
Business card generator for the Mozilla community

An active maintained version is available here:
http://mozilla.kreszkviz.hu/Card-Generator-Prod/

## How to add new card template ##
* Fork yourselves a copy of this repo and edit there.
* Add a normal HTML file of the card design to `/templates` directory and of the back side of the card to `/templates/back` directory.
* In the template HTML, add the attribute `contenteditable` for all text you want to make editable.
* Add any images required in template file to `templates/images` the path of the image will be ../templates/images/yourimage.png
* Put your CSS files separately to the ../css/yourdir/front.css, ../css/yourdir/front.css.
* The dimensions of the card template should be 439x259.
* Commit and push to your own fork, and open a pull request.
* Following fonts were installed: Roboto, MetaBold, Open Sans, FontAwesome, Fira Sans please note
if you would like to use another font it might be a bit tricky to make it work.
Lear more about vendor/mpdf.

_(Or if that's too much for you, you can just send the template design to gabriel.micko@codendesign.net or hello@mozillakerala.org)_

## Dependencies ##
* PHP5 with GD library

## Contributors ##
* [jsx](https://github.com/riverspirit)
* [shine](https://github.com/shinescodes)
* [Tanay](https://github.com/tanay1337)
* [Brylie](https://github.com/brylie)
* [Mte90](https://github.com/Mte90)
* [Gabriel Mičko](https://github.com/gabrielmicko)
