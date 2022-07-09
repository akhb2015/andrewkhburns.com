/**
 * Copyright 2022 Design Barn Inc.
 */

import { useState, useEffect } from '@wordpress/element';
import { gql } from 'graphql-request';
import * as React from 'react';
import { useQuery } from 'react-query';

import { ListView, ListViewWrapper } from '../../../../../components';
import { graphQLClient } from '../../../../../react-query';

const RECENT = gql`
  query Recent($page: Float) {
    recent(page: $page) {
      query
      currentPage
      perPage
      totalPages
      from
      to
      total
      results {
        id
        lottieUrl
        bgColor
        createdBy {
          name
          avatarUrl
        }
      }
    }
  }
`;

export const Recent: React.FC = () => {
  const [page, setPage] = useState(1);
  const [list, setList] = useState([]);
  const [totalPages, setTotalPages] = useState(0);

  const {
    isFetching,
    isLoading,
    refetch: getRecentLottie,
  } = useQuery(
    'RECENT',
    async () =>
      graphQLClient.request(RECENT, {
        page,
      }),
    {
      enabled: false,
      onSuccess: ({ recent: { results, totalPages: _totalPages } }: unknown) => {
        setList(() => results);
        setTotalPages(() => _totalPages);
      },
      onError: () => {
        /** */
      },
    },
  );

  useEffect(() => {
    getRecentLottie();
  }, [page]);

  return (
    <ListViewWrapper onChangePage={setPage} totalPages={totalPages}>
      <ListView list={list} isLoading={isLoading || isFetching} />
    </ListViewWrapper>
  );
};
