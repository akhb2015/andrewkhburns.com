/**
 * Copyright 2022 Design Barn Inc.
 */

import { Pagination } from '@lottiefiles/react-ui-kit';
import * as React from 'react';

interface IListWrapperProps {
  children: React.ReactNode;
  onChangePage(pageNumber: number): void;
  totalPages: number;
}

export const ListViewWrapper: React.FC<IListWrapperProps> = ({
  children,
  onChangePage,
  totalPages,
}: IListWrapperProps) => {
  return (
    <div className="lf-pl-8 lf-pr-8 lf-pt-8 lf-text-xs lf-flex lf-flex-col lf-justify-between lf-h-full lf-relative">
      {children}
      {totalPages > 0 && (
        <div id="pagination" className="lf-sticky lf-bottom-0 lf-right-0 lf-left-0 lf-bg-contentBg lf-opacity-90">
          <Pagination
            setPage={(newPage: number): void => onChangePage(newPage)}
            total={totalPages}
            midRange={2}
            current={1}
          />
        </div>
      )}
    </div>
  );
};
