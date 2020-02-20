# TYPO3 Extension ```stafflist```
[![pipeline status](https://gitlab.com/typo3graf/developer-team/extensions/stafflist/badges/master/pipeline.svg)](https://gitlab.com/typo3graf/developer-team/extensions/stafflist/-/commits/master)
[![Latest Stable Version](https://poser.pugx.org/typo3graf/stafflist/v/stable)](https://packagist.org/packages/typo3graf/stafflist)
[![Latest Unstable Version](https://poser.pugx.org/typo3graf/stafflist/v/unstable)](https://packagist.org/packages/typo3graf/stafflist)
[![Total Downloads](https://poser.pugx.org/typo3graf/stafflist/downloads)](https://packagist.org/packages/typo3graf/stafflist)
[![License](https://poser.pugx.org/typo3graf/stafflist/license)](https://packagist.org/packages/typo3graf/stafflist)

> This versatile staff list is the easiest way to add staff directories to your website. Company and faculty are presented in several easy to understand layouts, including a team list or employee directory, allowing visitors to get to know your company and capabilities.

Easily create a wide range of directories and listings:

* Faculty and Staff Directory
* Church Directory
* Directory of Doctors and Medical Staff
* Employee Directory
* Realtor’s Directory
* Staff List
* Team Members List

## 1. Features

**Staff List** is a highly configurable directory plugin to fit unique requirements of your organization.
* Based on extbase & fluid, implementing best practices from TYPO3 CMS
* Responsive layout.
* List layout.
* Detail page option.
* Selection of groups and fields to be displayed.
* Social Icons.
* Custom templates.
* [Well documented][1]

## 2. Usage

### 1) Installation
#### Installation using composer
The recommended way to install the extension is by using [Composer][2].

`composer require typo3graf/stafflist`.
#### Installation as extension from TYPO3 Extension Repository (TER)
Download and install the extension with the extension manager module.
### 2) Minimal setup
1) Include the static TypoScript of the extension.
2) Create some stafflist records on a sysfolder.
3) Create a plugin on a page and select at least the sysfolder as startingpoint.
## 3. Help supporting further development
**Why?** The stafflist extension is a powerful tool with a lot of features, always trying to thrive on the latest possibilities of the TYPO3 core. This implies a lot of work bringing this to the TYPO3 community.

**How?** There are multiple ways to support the further development

- **PayPal**: Support me by a donation on paypal.com. It is just one click away.
- **T3TERMINAL**: You can buy PRO version with more-features & free-support.
## 4. Administration corner
### 4.1 Changelog
Please look into the official extension documentation in changelog chapter
## 4.2. Release Management
Stafflist uses **semantic versioning** which basically means for you, that

- **bugfix updates** (e.g. 1.0.0 => 1.0.1) just includes small bugfixes or security relevant stuff without breaking changes.
- **minor updates** (e.g. 1.0.0 => 1.1.0) includes new features and smaller tasks without breaking changes.
- **major updates** (e.g. 1.0.0 => 2.0.0) breaking changes wich can be refactorings, features or bugfixes.

## 4.3. Contribution
**Pull requests** are welcome in general! Nevertheless please don't forget to add an issue and connect it to your pull requests. This is very helpful to understand what kind of issue the **Pull request** is going to solve.

- Bugfixes: Please describe what kind of bug your fix solve and give us feedback how to reproduce the issue. We're going to accept only bugfixes if I can reproduce the issue.
- Features: Not every feature is relevant for the bulk of ``stafflist`` users. In addition: We don't want to make ``stafflist`` even more complicated in usability for an edge case feature. Please discuss a new feature before.

Please read our [contribution guidelines](CONTRIBUTING.md).

[1]: https://docs.typo3.org/typo3cms/extensions/stafflist/
[2]: https://getcomposer.org
