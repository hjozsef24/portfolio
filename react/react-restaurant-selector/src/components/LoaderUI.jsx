import React from 'react'
import '../index.css'

export default function LoaderUI () {
  return React.createElement(
    'div',
    { className: 'loader-container' },
    React.createElement('div', { className: 'loader-spinner' })
  )
}
