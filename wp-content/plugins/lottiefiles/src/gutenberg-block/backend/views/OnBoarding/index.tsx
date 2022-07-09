/**
 * Copyright 2022 Design Barn Inc.
 */

import { useContext, useState } from '@wordpress/element';
import clsx from 'clsx';
import * as React from 'react';

import { IUserDataProps } from '../../../../admin/settings/reducer';
import { Illustration } from '../../../../assets/Icons';
import { LoadingAnimation } from '../../../../components/LoadingAnimation';
import { LoginAuto } from '../../../../components/login-auto';
import { LottieContext } from '../../../../context/lottie-provider';
import { URLS } from '../../../../helpers/consts';

export const OnBoarding: React.FC = () => {
  const [isSubmitting, setIsSubmitting] = useState(false);
  const { onLogin } = useContext(LottieContext);

  const onSuccess = async (data: IUserDataProps): Promise<void> => {
    await onLogin({
      shareUserData: false,
      shareWithOthers: false,
      copyLottieToMedia: false,
      switchAccount: false,
      userData: data,
    });
  };

  return (
    <div
      className={clsx([
        'lf-w-full lf-flex lf-justify-center lf-text-center',
        isSubmitting && 'lf-h-1/2 lf-items-center',
      ])}
    >
      <div className="lf-flex lf-mt-20 lf-items-center lf-flex-col lf-max-w-lg">
        {!isSubmitting && (
          <>
            <h2 className="text-4xl font-lf-bold lf-leading-snug lf-mb-4">
              Bring your web pages to life with Lottie animations
            </h2>
            <h5 className="lf-text-lg lf-font-light lf-mb-6">
              Log in with your LottieFiles account to access the world’s largest collection of free-to-use animations on
              your website.
            </h5>
          </>
        )}
        {isSubmitting && <LoadingAnimation />}
        <LoginAuto
          LoggingInMessage="Logging in via browser..."
          label="Log in with your LottieFiles account"
          className="lf-h-14 lf-px-9 lf-py-3 lf-text-base lf-font-lf-bold"
          onClick={(): void => {
            setIsSubmitting(true);
          }}
          isBrowserLogin
          onSuccess={onSuccess}
          onError={(): void => {
            /** */
          }}
        />
        {!isSubmitting && (
          <>
            <p className="lf-mt-6">Don’t have an account yet?</p>
            <a href={URLS.register} target="_blank" className="lf-_lf-link lf-text-teal-300">
              <strong className="lf-font-lf-bold">Get started</strong> for free
            </a>
          </>
        )}
      </div>
      <div className="lf-absolute lf-bottom-4 lf-left-4">
        <p className="lf-text-xs lf-text-gray-400">Copyright © 2022 Design Barn Inc.</p>
      </div>
      <div className="lf-absolute lf-bottom-0 lf-z-0">
        <Illustration />
      </div>
    </div>
  );
};
