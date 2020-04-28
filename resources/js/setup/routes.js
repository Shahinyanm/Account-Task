function lazyLoad (view) {
  return () => import(`../pages/${view}`)
}

export default [
  {
    path: '/',
    name: 'home',
    component: lazyLoad('Home'),
    props: true,
  },
  {
    path: '/accounts',
    name: 'accounts',
    component: lazyLoad('Accounts'),
    props: true,
  }
]
