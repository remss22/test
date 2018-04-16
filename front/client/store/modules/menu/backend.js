import lazyLoading from './lazyLoading'

export default {
  name: 'Backend',
  path: '/backend',
  meta: {
    icon: 'fa-rocket',
    expanded: false,
    link: 'cars/index.vue'
  },
  component: lazyLoading('backend', true)
}
