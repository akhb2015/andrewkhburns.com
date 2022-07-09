/**
 * Copyright 2022 Design Barn Inc.
 */

import packageJson from '../../package.json';
// const trackerApiKey = process.env.TRACKER_API_KEY as string;

export const pluginClient = 'wordpress-plugin';
export const isAllowTracking = 'IS_ALLOW_TRACKING';
export const token = 'LF_TOKEN';

export const appDetails = {
  name: packageJson.name,
  version: packageJson.version,
  hitcountsource: packageJson.hitcountsource,
};

export const api = {
  graphql: 'https://graphql.lottiefiles.com',
  domain: 'https://lottiefiles.com',
};

export const amplitudeAPIDomain = 'https://api2.amplitude.com/2/httpapi';

export const URLS = {
  main: 'https://lottiefiles.com',
  register: 'https://lottiefiles.com/register',
  feedback: 'https://lottiefiles.zendesk.com/hc/en-us/requests/new',
  zendesk: 'https://lottiefiles.zendesk.com/hc/en-us/categories/360002488051-LottieFiles-Plugins',
  feedbackCanny: 'https://feedback.lottiefiles.com/plugin-wordpress',
  privacy: 'https://lottiefiles.com/page/privacy-policy',
};

export const routes = {
  login: '/login',
  discover: '/discover',
  myAnimation: '/my-animations',
  import: '/import',
  preview: '/preview',
};

export const PAGE_SIZE = 18;
