// let menu = document.querySelector("#menu-btn")
// let navbar = document.querySelector(".navbar")

// document.querySelector('#menu-btn')
// $('#menu-btn')

// menu.onclick = () =>{
//     menu.classList.toggle("fa-times")
//     navbar.classList.toggle("active")
// }


// window.onscroll = () =>{
//     menu.classList.remove("fa-times")
//     navbar.classList.remove("active")
// }

$(document).ready(async () => {
    let navbar = await $.get('navbar.json')

    let mynavbar = ''
    navbar.map(v => {
        mynavbar += `<a href="${v.url}">${v.name}</a>`
    })
    mynavbar += `<a href="#" class="btn">log in</a>`
    $('nav.navbar').html(mynavbar)
    let browserLogo = {
        'chrome': 'images/logo-chrome.svg',
        'firefox': 'images/logo-firefox.svg',
        'opera': 'images/logo-opera.svg'
    }
    let mybrowser = browser().toString().toLowerCase() ?? 'Chrome'
    let tmpbrowserLogo = browserLogo[mybrowser] ?? 'images/logo-chrome.svg'
    $('#btn-logo-browser').attr('src', tmpbrowserLogo)
    $('#btn-text-browser').text(mybrowser)
    // console.log(browser())
})

$('#menu-btn').click(() => {
    // $('#menu-btn').classList.toggle("fa-times")
    // $('.navbar').classList.toggle("active")
    $('#menu-btn').toggleClass('fa-times')
    $('.navbar').toggleClass('active')
})


// for detect browser used
function browser() {
    // Return cached result if avalible, else get result then cache it.
    if (browser.prototype._cachedResult)
        return browser.prototype._cachedResult;

    // Opera 8.0+
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';

    // Safari 3.0+ "[object HTMLElementConstructor]" 
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);

    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;

    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;

    // Chrome 1+
    var isChrome = !!window.chrome;

    // Blink engine detection
    var isBlink = (isChrome || isOpera) && !!window.CSS;

    return browser.prototype._cachedResult =
        isOpera ? 'Opera' :
        isFirefox ? 'Firefox' :
        isSafari ? 'Safari' :
        isChrome ? 'Chrome' :
        isIE ? 'IE' :
        isEdge ? 'Edge' :
        isBlink ? 'Blink' :
        "Don't know";
};
