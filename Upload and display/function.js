//document.addEventListener('contextmenu', event => event.preventDefault()); // prevent right click context menu 

// prevent write click context menu
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    return false;
  });

// disable Keyboard Shortcut Eg. Ctrl+s
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 's') {
      e.preventDefault();
      return false;
    }
  });

  