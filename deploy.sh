#!/usr/local/bin/zsh

./vendor/bin/jigsaw build production
git add build_production
git commit -m "Build for deploy"
git subtree push --prefix build_production origin master
