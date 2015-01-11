Card Generator
==============

Business card generator for the Mozilla community


## How to add new card template ##
* Fork yourselves a copy of this repo and edit there.
* Add a normal HTML file of the card design to `/templates` directory and of the back side of the card to `/templates/back` directory.
* In the template HTML, add the attribute `contenteditable` for all text you want to make editable.
* Add any images required in template file to `templates/images` and use their absolute path in the html (absoute path starting with `http://cards.mozillakerala.org/templates/images/`)
* The dimensions of the card template should be 388x227px
* Commit and push to your own fork, and open a pull request.

_(Or if that's too much for you, you can just send the template design to hello@mozillakerala.org)_

## Dependencies ##
* PHP5 with GD library

## Contributors ##
* [jsx](https://github.com/riverspirit)
* [shine](https://github.com/shinescodes)
* [Tanay](https://github.com/tanay1337)
