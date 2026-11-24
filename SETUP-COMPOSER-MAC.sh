#!/bin/bash
# Install Homebrew (jika belum ada), PHP, Composer, dan Git di Mac.
set -e
if ! command -v brew >/dev/null 2>&1; then
  /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
fi
brew install composer git
php -v
composer -V
git --version
