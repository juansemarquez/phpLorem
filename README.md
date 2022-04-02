# phpLorem

This is a single-file PHP command line script. It returns "lorem ipsum" text.

## Usage:

```
lorem.php NUMBER ELEMENT
```

where `ELEMENT` can be:

- 'p' for paragraphs (default),
- 's' for sentences,
- 'w' for words,
- 'c' for characters,

and `NUMBER` is the number of elements you need.

## Examples

```
lorem.php 5 p
```

Shows 5 paragraphs of lorem ipsum text. (Parameter "p" is the default option, so
it's optional in the last example.)

---

```
lorem.php 8 s
```

Shows 8 sentences of lorem ipsum text.

---

```
lorem.php 15 w
```

Shows 15 words of lorem ipsum text. (Note that it may end in the middle of a
sentence).

---

```
lorem.php 150 w
```

Shows 150 characters of lorem ipsum text. (Note that it may end in the middle of
a word).

## Requirements

Any version of PHP and a command-line interface, no dependences needed.

## Useful alias

In GNU/Linux, you can place an alias on `~/.bash_aliases` or `~/.bashrc`:

```
alias lorem="php /path/to/your/lorem.php "
```

so you can use the script as a command from any directory in your system:

```
lorem 5 s
```
