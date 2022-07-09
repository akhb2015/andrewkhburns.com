/**
 * Copyright 2022 Design Barn Inc.
 */

import { GraphQLClient } from 'graphql-request';

import { API_ENDPOINT } from '../consts';

export const graphQLClient = new GraphQLClient(API_ENDPOINT, {
  headers: {},
});
