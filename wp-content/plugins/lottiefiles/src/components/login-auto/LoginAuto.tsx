/**
 * Copyright 2020 Design Barn Inc.
 */

import { useTracker } from '@context/tracker-provider';
import { HitCountEvents } from '@helpers/enums';
import { eventEnums, eventsConst } from '@lottiefiles/plugin-tracker';
import { Appearance, Size, TextColor } from '@lottiefiles/react-ui-kit';
import { useEffect, useState } from '@wordpress/element';
import { gql } from 'graphql-request';
import * as React from 'react';
import { useMutation, useQuery } from 'react-query';

import { Button } from '../../_components';
import { graphQLClient } from '../../react-query';

const CREATE_LOGIN_TOKEN = gql`
  mutation createLoginToken($appKey: String) {
    createLoginToken(appKey: $appKey) {
      token
      loginUrl
    }
  }
`;

const CHECK_TOKEN_LOGIN = gql`
  mutation tokenLogin($token: String!) {
    tokenLogin(token: $token) {
      accessToken
      tokenType
    }
  }
`;

const GET_VIEWER_DATA = gql`
  query viewer {
    viewer {
      id
      name
      email
      avatarUrl
      username
    }
  }
`;

interface ILoginAutoProps {
  LoggingInMessage?: string;
  className?: string;
  isBrowserLogin?: boolean;
  label: string;
  onClick(): void;
  onError(): void;
  onSuccess(val: unknown): void;
}

export const LoginAuto: React.FC<ILoginAutoProps> = ({
  LoggingInMessage = 'Logging In...',
  className,
  isBrowserLogin = false,
  label,
  onClick,
  onSuccess,
}: ILoginAutoProps) => {
  const [loginSiteUrl, setLoginSiteUrl] = useState<string>();
  const [loginToken, setLoginToken] = useState<string>();
  const [isEnabled, setIsEnabled] = useState<boolean>(false);
  const [queryInterval, setQueryInterval] = useState<number>(0);
  const [accessToken, setAccessToken] = useState<number>(0);
  const [isLoggingIn, setIsLoggingIn] = useState<boolean>(false);
  const tracker = useTracker();

  const { refetch: getViewerData } = useQuery('GET_VIEWER_DATA', async () => graphQLClient.request(GET_VIEWER_DATA), {
    enabled: false,
    onSuccess: (data: unknown) => {
      if (data && data.viewer) {
        setIsEnabled(() => false);
        onSuccess({
          accessToken,
          ...data.viewer,
        });

        tracker.pluginTracking({
          eventType: eventsConst.click.login,
          userId: data.viewer.id,
          method: HitCountEvents.LOGIN,
          eventProperties: { type: eventEnums.loginIntentType.completed },
        });

        setIsLoggingIn(false);
      }
    },
    onError: () => {
      /** */
    },
  });

  useQuery('CHECK_TOKEN_LOGIN', async () => graphQLClient.request(CHECK_TOKEN_LOGIN, { token: loginToken }), {
    enabled: isEnabled,
    refetchInterval: queryInterval,
    onSuccess: (response: unknown) => {
      if (response && response.tokenLogin) {
        setAccessToken(() => response.tokenLogin.accessToken);
        graphQLClient.setHeaders({
          authorization: `Bearer ${response.tokenLogin.accessToken}`,
        });
        setQueryInterval(() => 0);
        getViewerData();
      }
    },
    onError: () => {
      /** */
    },
  });

  const { mutate: createPollToken } = useMutation(
    async () =>
      graphQLClient.request(CREATE_LOGIN_TOKEN, {
        appKey: 'wordpress-plugin',
      }),
    {
      onSuccess: ({
        createLoginToken: { loginUrl, token },
      }: {
        createLoginToken: { loginUrl: string; token: string };
      }): void => {
        setLoginToken(() => token);
        setLoginSiteUrl(() => loginUrl);
        setQueryInterval(() => 2000);
        setIsEnabled(() => true);
      },
      onError: () => {
        /** */
      },
    },
  );

  useEffect(() => {
    if (loginSiteUrl) {
      window.open(loginSiteUrl, '_blank');
    }
  }, [loginSiteUrl]);

  if (isBrowserLogin && isLoggingIn) {
    return <div className="mt-5">{LoggingInMessage}</div>;
  }

  return (
    <Button
      appearance={Appearance.primary}
      size={Size.small}
      disabled={isLoggingIn}
      className={className}
      textColor={TextColor.white}
      onClick={(): void => {
        tracker.pluginTracking({
          eventType: eventsConst.click.login,
          eventProperties: { type: eventEnums.loginIntentType.clicked },
        });
        onClick();
        setIsLoggingIn(true);
        createPollToken();
      }}
    >
      {isLoggingIn ? LoggingInMessage : label}
    </Button>
  );
};
