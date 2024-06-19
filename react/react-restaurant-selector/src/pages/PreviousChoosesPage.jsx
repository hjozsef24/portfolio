import React, { useState, useEffect } from 'react'; 
import TextUI from '../components/TextUI';
import ChoiceList from '../components/ChooseList';
import LoadMoreButton from '../components/LoadMoreButton';
import NoChoosesMessage from '../components/NoChoosesMessage';
import BackLink from '../components/BackLink';

function PreviousChoosesPage() {
  const [previousChooses, setPreviousChooses] = useState(() => {
    const storedChooses = localStorage.getItem('previousChooses');
    return storedChooses ? JSON.parse(storedChooses) : [];
  });

  const [displayedChooses, setDisplayedChooses] = useState([]);
  const [visibleItems, setVisibleItems] = useState(10);

  useEffect(() => {
    setDisplayedChooses(previousChooses.slice(0, visibleItems));
  }, [previousChooses, visibleItems]);

  const handleLoadMore = () => {
    setVisibleItems(prev => prev + 10);
  };

  const moreToLoad = displayedChooses.length < previousChooses.length;
  return (
    <div>
      <TextUI text="Korábbi választásaim:" type="h1" />
      {displayedChooses.length > 0 ? (
        <>
          <ChoiceList chooses={displayedChooses} />
          <LoadMoreButton onLoadMore={handleLoadMore} moreToLoad={moreToLoad} />
          <BackLink />
        </>
      ) : (
        <>
          <NoChoosesMessage />
          <BackLink />
        </>
      )}
    </div>
  );
}

export default PreviousChoosesPage;