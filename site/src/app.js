export class App {
  configureRouter(config, router) {
    config.title = 'ewic';
    config.map([
      { route: ['','welcome'], name: 'welcome', moduleId: './welcome', nav: true, title:'Welcome' },
      { route: 'users', name: 'users', moduleId: './users', nav: true, title: 'Users' },
      { route: 'about', name: 'about', moduleId: './about', nav: true, title: 'About Me' },
    ]);

    this.router = router;
  }
}