import lazyLoading from './lazyLoading'

export default {
  name: 'Frontend',
  path: '/frontend',
  meta: {
    icon: 'fa-laptop',
    expanded: false
  },
  component: lazyLoading('frontend', true)
}
