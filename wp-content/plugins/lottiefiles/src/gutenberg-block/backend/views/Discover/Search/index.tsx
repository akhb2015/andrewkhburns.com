/**
 * Copyright 2022 Design Barn Inc.
 */

import { useEffect, useState } from '@wordpress/element';
import { gql } from 'graphql-request';
import * as React from 'react';
import { useQuery } from 'react-query';
import { useParams } from 'react-router-dom';

import { NoSearchData } from '../../../../../assets/Icons';
import { ListView, ListViewWrapper } from '../../../../../components';
import { NoData } from '../../../../../components/NoData';
import { PAGE_SIZE } from '../../../../../helpers/consts';
import { graphQLClient } from '../../../../../react-query';

const SEARCH = gql`
  query Search($page: Float, $pageSize: Float, $query: String!) {
    search(page: $page, pageSize: $pageSize, query: $query) {
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

export const Search: React.FC = () => {
  const [page, setPage] = useState(1);
  const [list, setList] = useState([]);
  const [totalPages, setTotalPages] = useState(0);
  const { query } = useParams();

  const {
    isFetching,
    isLoading,
    refetch: getSearchResults,
  } = useQuery(
    'SEARCH',
    async () =>
      graphQLClient.request(SEARCH, {
        page,
        pageSize: PAGE_SIZE,
        query,
      }),
    {
      enabled: false,
      onSuccess: ({ search: { results, totalPages: _totalPages } }: unknown) => {
        setList(() => results);
        setTotalPages(() => _totalPages);
      },
      onError: () => {
        /** */
      },
    },
  );

  useEffect(() => {
    getSearchResults();
  }, [page, query]);

  if (list.length === 0 && !(isLoading || isFetching)) {
    return (
      <NoData lottieBy="Radhikakpor" noDataText="No result found">
        <NoSearchData />
      </NoData>
    );
  }

  return (
    <ListViewWrapper onChangePage={setPage} totalPages={totalPages}>
      <ListView list={list} isLoading={isLoading || isFetching} />
    </ListViewWrapper>
  );
};
