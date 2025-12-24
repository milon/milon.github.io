#!/usr/bin/env node

// Wrapper script to run mix and filter out Sass deprecation warnings
const { exec } = require('child_process');
const path = require('path');

// Build the command
const args = process.argv.slice(2).join(' ');
const mixCommand = path.join(__dirname, '..', 'node_modules', '.bin', 'mix') + (args ? ' ' + args : '');

exec(mixCommand, (error, stdout, stderr) => {
    // Filter deprecation warnings from both stdout and stderr
    const filteredStdout = stdout.split('\n').filter(line => !line.includes('DEPRECATION WARNING')).join('\n');
    const filteredStderr = stderr.split('\n').filter(line => !line.includes('DEPRECATION WARNING')).join('\n');
    
    if (filteredStdout) process.stdout.write(filteredStdout);
    if (filteredStderr) process.stderr.write(filteredStderr);
    
    // Exit with the original error code if there was one
    process.exit(error ? error.code : 0);
});

