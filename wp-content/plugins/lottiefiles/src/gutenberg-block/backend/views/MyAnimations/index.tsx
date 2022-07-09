/**
 * Copyright 2022 Design Barn Inc.
 */

import { Transition } from '@headlessui/react';
import { useState, useEffect, useContext } from '@wordpress/element';
import * as React from 'react';
import { Route, Routes, useNavigate, useLocation } from 'react-router-dom';

import { LottieContext } from '../../../../context/lottie-provider';
import { withBase } from '../../../../hoc';
import { graphQLClient } from '../../../../react-query';

import { Downloads } from './Downloads';
import { Likes } from './Likes';
import { PrivateAnimation } from './PrivateAnimations';
import { PublicAnimation } from './PublicAnimations';
// import { Purchases } from './Purchases'; //Commented for future use

const Sidebar: React.FC = () => {
  const navigate = useNavigate();
  const location = useLocation();

  const active = (tabName: string): string => {
    const isRecent = tabName === 'downloads' && location.pathname === '/my-animations';

    return location.pathname === `/my-animations/${tabName}` || isRecent ? 'lf-active' : '';
  };

  return (
    <ul>
      <li className={`lf-_lf-tab ${active('downloads')}`} onClick={(): void => navigate('/my-animations/downloads')}>
        <span className="lf-text-sm lf-font-semibold">My Downloads</span>
      </li>
      <li className={`lf-_lf-tab ${active('likes')}`} onClick={(): void => navigate('/my-animations/likes')}>
        <span className="lf-text-sm lf-font-semibold">My Likes</span>
      </li>
      <li
        className={`lf-_lf-tab ${active('public-animations')}`}
        onClick={(): void => navigate('/my-animations/public-animations')}
      >
        <span className="lf-text-sm lf-font-semibold">My Public Animations</span>
      </li>
      {/* Commented for future use
      <li className={`_lf-tab ${active('purchases')}`} onClick={(): void => navigate('/my-animations/purchases')}>
        <span className="text-sm font-semibold">My Purchases</span>
      </li> */}
      <li
        className={`lf-_lf-tab ${active('private-animations')}`}
        onClick={(): void => navigate('/my-animations/private-animations')}
      >
        <span className="lf-text-sm lf-font-semibold">My Private Animations</span>
      </li>
    </ul>
  );
};

const MyAnimations: React.FC = () => {
  const { appData } = useContext(LottieContext);

  const [show, setShow] = useState(false);

  useEffect(() => {
    setShow(true);
    graphQLClient.setHeaders({
      authorization: `Bearer ${appData.userData.accessToken}`,
    });

    return (): void => setShow(false);
  }, []);

  return (
    <Transition
      show={show}
      enter="lf-transition lf-ease-in-out lf-duration-300 lf-transform"
      enterFrom="lf--translate-x-full"
      enterTo="lf-translate-x-0"
      leave="lf-transition lf-ease-in-out lf-duration-300 lf-transform"
      leaveFrom="lf--translate-x-0"
      leaveTo="lf-translate-x-full"
      className="lf-h-full"
    >
      <Routes>
        <Route path="/*" element={<Downloads />} />
        <Route path="/downloads" element={<Downloads />} />
        <Route path={`/likes`} element={<Likes />} />
        <Route path={`/public-animations`} element={<PublicAnimation />} />
        {/*  Commented for future use
        <Route path={`/purchases`} element={<Purchases />} />*/}
        <Route path={`/private-animations`} element={<PrivateAnimation />} />
      </Routes>
    </Transition>
  );
};

export default withBase({
  SidebarContent: Sidebar,
})(MyAnimations);
