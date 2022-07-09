/**
 * Copyright 2022 Design Barn Inc.
 */

export const getEpoch = (): string => {
  return Date.now().toString();
};

export const capitalizeFirstLetter = (string: string): string => {
  return string.charAt(0).toUpperCase() + string.slice(1);
};
