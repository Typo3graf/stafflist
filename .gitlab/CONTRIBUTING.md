# Contributing

When contributing to this repository, please first discuss the change you wish to make via issue,
email, or any other method with the owners of this repository before making a change.

## Getting Started

* Make sure you have a [GitLab account](https://gitlab.com/signup/free)
* Submit a ticket for your [issue](https://gitlab.com/typo3graf/developer-team/extensions/stafflist/issues), assuming one does not already exist.
  * Clearly describe the issue including steps to reproduce when it is a bug.
* Fork the repository on GitHub

## Making Changes

* Create a topic branch from where you want to base your work.
  * This is usually the master branch.
  * Only target release branches if you are certain your fix must be on that
    branch.
  * To quickly create a topic branch based on master; `git checkout -b
    fix/master/my_contribution master`. Please avoid working directly on the
    `master` branch.
* Make commits of logical units.
* Use `./php-cs-fixer fix --config-file Build/.php_cs.dist` to make sure the code is formatted correctly.
* Make sure your commit messages are in the proper format. Use either `[TASK]`, `[FEATURE]`, `[BUGFIX]` or `[DOC]`

````
    [TASK] Make the example in CONTRIBUTING imperative and concrete

    The first line is a real life imperative statement.
    The body describes the behavior without the patch,
    why this is a problem, and how the patch fixes the problem when applied.

    Resolves: #123
````

* Make sure you have added the necessary tests for your changes.
* Run _all_ the tests to assure nothing else was accidentally broken. However travis will do that for you as well.
