import React from 'react';

const LoadMoreButton = ({ onLoadMore, moreToLoad }) => (
  moreToLoad && (
    <div className="mt-24">
      <button onClick={onLoadMore}>Még több ebédem</button>
    </div>
  )
);

export default LoadMoreButton;