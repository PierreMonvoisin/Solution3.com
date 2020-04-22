if (localStorage.getItem('main_font_color') == null){
  if (typeof(Storage) != "undefined") {
    localStorage.setItem('main_font_color', userPersonnalisations.main_font_color);
    localStorage.setItem('secondary_font_color', userPersonnalisations.secondary_font_color);
    localStorage.setItem('main_background_color', userPersonnalisations.main_background_color);
    localStorage.setItem('secondary_background_color', userPersonnalisations.secondary_background_color);
    localStorage.setItem('header_background_color', userPersonnalisations.header_background_color);
    localStorage.setItem('stats_background_color', userPersonnalisations.stats_background_color);
    localStorage.setItem('display_timer', Number(userPersonnalisations.display_timer));
    localStorage.setItem('main_font', userPersonnalisations.main_font);
    localStorage.setItem('timer_font', userPersonnalisations.timer_font);
    var expiryDate = new Date();
    expiryDate.setTime(expiryDate.getTime() + (7 * 24 * 60 * 60 * 1000));
    document.cookie = 'personnalisationsStored=true; expires=' + expiryDate.toUTCString() + '; path=/';
  } else {
    console.warn('Impossible d\'enregistrer les personnalisations dans le stockage local du navigateur !');
  }
}
