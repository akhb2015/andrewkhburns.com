/**
 * Copyright 2022 Design Barn Inc.
 */

import { useContext } from '@wordpress/element';
import * as React from 'react';
import { Navigate, Route, Routes, useLocation } from 'react-router-dom';

import { LottieContext } from '../../context/lottie-provider';
import { IAppRouteProps } from '../../interfaces';

import { Discover, Import, MyAnimations, OnBoarding, Preview } from './views';

export const AppRoute: React.FC<IAppRouteProps> = ({ attributes, exploreLottie, setAttributes }: IAppRouteProps) => {
  const { appData, isAppLoading } = useContext(LottieContext);
  const prevLocation = useLocation();

  if (isAppLoading) {
    return <div className="lf-spinner large"></div>;
  }

  return (
    <Routes>
      {appData ? (
        <>
          <Route path="/discover/*" element={<Discover />} />
          <Route path="/*" element={<Navigate to="/discover/recent" state={{ prevLocation }} />} />
          <Route
            path="/preview"
            element={<Preview attributes={attributes} setAttributes={setAttributes} exploreLottie={exploreLottie} />}
          />
          <Route path="/my-animations/*" element={<MyAnimations />} />
          <Route path="/import" element={<Import />}></Route>
        </>
      ) : (
        <Route path="/*" element={<OnBoarding />} />
      )}
    </Routes>
  );
};
