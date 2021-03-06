# Change Log
All notable changes to this project will be documented in this file. This project adheres to [Semantic Versioning](http://semver.org)

## MASTER
### Added
- Added `--to=` option to `backup:get` to allow specifying of a local download location. (#1520)
- Removed framework type check from `drush` and `wp` commands. (#1521)
- Terminus now checks for new versions after every command run. (#1523)
- Fixed backup:restore. (#1529)
- Fixed env:wake to target domains with zone names. (#1530)

## 1.0.0-beta.2 - 2017-01-10
### Fixed
- Fixed fatal error by adding back the use statement for ProcessUtils in SSHBaseCommand. (#1494)
- Pinned PHP-VCR version to 1.3.1 due to issues with turning PUT into POST. (#1501)

## 1.0.0-beta.1 - 2016-12-21
### Changed
- Moved to Symfony Console
- Updated command structure. Please see [https://pantheon.io/docs/terminus/commands/compare](https://pantheon.io/docs/terminus/commands/compare) for updates.

_Terminus version v1.0 and later introduces a new command line and argument structure that is incompatible with any custom scripts that use 0.x Terminus or older plugins that you may be using.
Please consider the impact to your automation scripts and plugins before upgrading to Terminus v1.0._
