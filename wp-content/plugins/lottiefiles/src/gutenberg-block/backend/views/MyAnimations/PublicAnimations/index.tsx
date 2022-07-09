/**
 * Copyright 2022 Design Barn Inc.
 */

import { useEffect, useState } from '@wordpress/element';
import { gql } from 'graphql-request';
import * as React from 'react';
import { useQuery } from 'react-query';

import { NoLikes } from '../../../../../assets/Icons';
import { ListView, ListViewWrapper } from '../../../../../components';
import { NoData } from '../../../../../components/NoData';
import { PAGE_SIZE } from '../../../../../helpers/consts';
import { graphQLClient } from '../../../../../react-query';

const PUBLIC_ANIMATION = gql`
  query Contributions($page: Float) {
    contributions(page: $page) {
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

export const PublicAnimation: React.FC = () => {
  const [page, setPage] = useState(1);
  const [list, setList] = useState([]);
  const [totalPages, setTotalPages] = useState(0);

  const {
    isFetching,
    isLoading,
    refetch: getPublicAnimationResults,
  } = useQuery(
    'PUBLIC_ANIMATION',
    async () =>
      graphQLClient.request(PUBLIC_ANIMATION, {
        page,
        pageSize: PAGE_SIZE,
      }),
    {
      enabled: false,
      onSuccess: ({ contributions: { results, totalPages: _totalPages } }: unknown) => {
        setList(() => results);
        setTotalPages(() => _totalPages);
      },
      onError: () => {
        /** */
      },
    },
  );

  useEffect(() => {
    getPublicAnimationResults();
  }, [page]);

  if (!(isLoading || isFetching) && list.length === 0) {
    return (
      <NoData lottieBy="Radhikakpor" noDataText="No result found">
        <NoLikes />
      </NoData>
    );
  }

  return (
    <ListViewWrapper onChangePage={setPage} totalPages={totalPages}>
      <ListView list={list} isLoading={isLoading || isFetching} />
    </ListViewWrapper>
  );
};
