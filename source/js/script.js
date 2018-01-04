// force https redirection
var host = 'milon.github.io';
if (window.location.host == host && window.location.protocol != 'https:') {
    window.location.protocol = 'https:';
}
