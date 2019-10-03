#!/usr/local/bin/zsh

npm run prod
rm -rf assets/build/fonts/vendor
./vendor/bin/jigsaw build production
git add build_production
git commit -m "Build for deploy"
git subtree push --prefix build_production origin master
