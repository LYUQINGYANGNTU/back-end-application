#!/bin/bash
service nginx restart
service apache2 restart
npx webpack-dev-server --entry ./client.js --output bundle.js --debug --devtool inline-source-map