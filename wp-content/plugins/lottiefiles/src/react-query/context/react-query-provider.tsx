/**
 * Copyright 2022 Design Barn Inc.
 */

import * as React from 'react';
import { QueryClient, QueryClientProvider } from 'react-query';

import { IReactQueryProviderProps } from '../../interfaces';

// Create a client
const queryClient = new QueryClient();

export const ReactQueryProvider: React.FC<IReactQueryProviderProps> = ({ children }: IReactQueryProviderProps) => (
  <QueryClientProvider client={queryClient}>{children}</QueryClientProvider>
);
