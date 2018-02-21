function CenterWindow(windowWidth, windowHeight, windowOuterHeight, url, wname, features) {
  var centerLeft = parseInt((window.screen.availWidth - windowWidth) / 2);
  var centerTop = parseInt(((window.screen.availHeight - windowHeight) / 2) - windowOuterHeight);

  var misc_features;
  if (features) {
    misc_features = ', ' + features;
  }
  else {
    misc_features = ', status=no, location=no, scrollbars=yes, resizable=yes';
  }
  var windowFeatures = 'width=' + windowWidth + ',height=' + windowHeight + ',left=' + centerLeft + ',top=' + centerTop + misc_features;
  var win = window.open(url, wname, windowFeatures);
  win.focus();
  return win;
}
