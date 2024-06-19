import React, { createContext, useState, useEffect, useContext, useRef } from 'react';
import { getRandomInt } from '../utils/helpers';

export const AppContext = createContext();

export const AppProvider = ({ children }) => {
  const [restaurants, setRestaurants] = useState([
    { id: 0, name: 'Fleck' },
    { id: 1, name: 'Salve' },
    { id: 2, name: 'Kínai' },
    { id: 3, name: 'Spar' },
    { id: 4, name: 'Pasta' },
    { id: 5, name: 'Arriba' },
    { id: 6, name: 'Egyetemi menza' },
    { id: 7, name: 'Veranda' },
    { id: 8, name: 'McDonalds' }
  ]);

  const useLocalStorageState = (key, defaultValue) => {
    const [state, setState] = useState(() => {
      const savedState = localStorage.getItem(key);
      return savedState ? JSON.parse(savedState) : defaultValue;
    });

    useEffect(() => {
      localStorage.setItem(key, JSON.stringify(state));
    }, [state, key]);

    return [state, setState];
  };

  const [spinCount, setSpinCount] = useLocalStorageState('spinCount', 0);
  const [acceptedSpin, setAcceptedSpin] = useLocalStorageState('acceptedSpin', false);
  const [maxSpin, setMaxSpin] = useLocalStorageState(
    'maxSpin',
    getRandomInt(2, restaurants.length)
  );
  const [tooChoosy, setTooChoosy] = useState(false);
  const [generatedRestaurant, setGeneratedRestaurant] = useState(null);

  const timeoutRef = useRef(null);

  useEffect(() => {
    const clearLocalStorageAtMidnight = () => {
      const now = new Date();
      const midnight = new Date();
      midnight.setHours(23, 59, 59, 0);

      const timeUntilMidnight = midnight.getTime() - now.getTime();

      if (timeUntilMidnight <= 0) {
        timeoutRef.current = setTimeout(clearLocalStorageAtMidnight, 24 * 60 * 60 * 1000);
        return;
      }

      timeoutRef.current = setTimeout(() => {
        localStorage.setItem('spinCount', JSON.stringify(0));
        localStorage.setItem('maxSpin', JSON.stringify(getRandomInt(2, restaurants.length)));
        localStorage.setItem('acceptedSpin', JSON.stringify(false));
        clearLocalStorageAtMidnight();
      }, timeUntilMidnight);
    };

    clearLocalStorageAtMidnight();

    return () => clearTimeout(timeoutRef.current);
  }, [restaurants.length]);

  const calculateTimeRemaining = () => {
    const currentTime = new Date();
    const targetTime = new Date();
    targetTime.setHours(14, 0, 0, 0);

    let difference = targetTime.getTime() - currentTime.getTime();
    if (difference < 0) {
      difference = 0;
    }

    const hours = Math.floor(difference / (1000 * 60 * 60));
    const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((difference % (1000 * 60)) / 1000);

    return `${hours.toString().padStart(2, '0')}:${minutes
      .toString()
      .padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
  };

  const [timeRemaining, setTimeRemaining] = useState(calculateTimeRemaining());

  useEffect(() => {
    const intervalId = setInterval(() => {
      const formattedTime = calculateTimeRemaining();
      setTimeRemaining(formattedTime);
    }, 1000);

    return () => clearInterval(intervalId);
  }, []);

  return (
    <AppContext.Provider
      value={{
        spinCount,
        setSpinCount,
        acceptedSpin,
        setAcceptedSpin,
        restaurants,
        setRestaurants,
        timeRemaining,
        maxSpin,
        tooChoosy,
        setTooChoosy,
        generatedRestaurant,
        setGeneratedRestaurant
      }}
    >
      {children}
    </AppContext.Provider>
  );
};

export function useApp() {
  return useContext(AppContext);
}
